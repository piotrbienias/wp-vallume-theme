set :linked_files, fetch(:linked_files, []).push('config/nginx.conf')

set :repo_url, 'git@github.com:piotrbienias/wp-vallume-theme.git'

set :deploy_to, -> { "/srv/var/www/blackballoon/#{fetch(:application)}" }

set :stage, :staging

# Database synchronization data
set :db_local_url, 'http://dev-wp.localhost.pl/wp'
set :db_remote_url, 'http://dev-wp.blackballoon.pl/wp'
set :db_file, 'db.sql'
set :db_file_remote, fetch(:deploy_to) + '/' + fetch(:db_file)
set :db_import_options, "--skip-columns=guid --url=" + fetch(:db_local_url)


# Uplodas synchronization data
set :uploads_local_path, 'web/app/uploads/'
set :uploads_remote_path, -> {"#{shared_path.to_s}/web/app/uploads/"}
set :rsync_options, "--recursive --progress --rsh=ssh -avz --stats"


role :app, %w{pbienias@blackballoon.pl}
role :web, %w{pbienias@blackballoon.pl}

server 'blackballoon.pl', user: 'pbienias', roles: %w{app web}

set :ssh_options, {
    keys: %w(~/.ssh/bb_atman_rsa),
    forward_agent: true
}

# Reload PHP after deploy
namespace :deploy do
    desc 'Reload php7.0-fpm service'
        task :reload_php do
            on roles(:app), in: :sequence, wait: 5 do
                execute :sudo, :systemctl, :reload, "php7.0-fpm.service"
        end
    end
end


# Export local database
namespace :database do
    desc 'Export local database'
    task :export_db do
    run_locally do
            execute :wp, :db, :export, fetch(:db_file)
        end
    end
end


# Import local database on server
namespace :database do
    desc 'Import database on server'
    task :import_db do
        on roles(:app) do
            upload! "db.sql", fetch(:db_file_remote)
            within fetch(:deploy_to) + '/current' do
                execute :wp, :db, :import, fetch(:db_file_remote)
                execute :rm, fetch(:db_file_remote)
                execute :wp, "search-replace", fetch(:db_local_url), fetch(:db_remote_url), fetch(:db_import_options)
            end
        end
    end
end


# Synchronize uploads between local and remote
namespace :uploads do
    desc 'Synchronize uploads'
    task :sync do
        on roles(:app).each do |role|
            run_locally do
                execute :rsync, fetch(:rsync_options), fetch(:uploads_local_path), "#{role.user}@#{role.hostname}:#{fetch(:uploads_remote_path)}"
            end
        end
    end
end



# Reload PHP7.0 FPM after deploy
# after 'deploy:publishing', 'database:export_db'
# after 'database:export_db', 'database:import_db'
# after 'database:import_db', 'deploy:reload_php'
# after 'deploy:reload_php', 'uploads:sync'

after 'deploy:publishing', 'deploy:reload_php'

fetch(:default_env).merge!(wp_env: :staging)
