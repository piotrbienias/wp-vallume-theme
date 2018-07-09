# In case of normal SSH - simple procedure
# In case of fucked up SSH like on home.pl (Shared hosting) - other process:
#   - normal deploy to staging server (but to other directory)
#   - rsync from staging server to production server
#   - perform operations in single-line command via SSH

set :linked_files, fetch(:linked_files, []).push('web/.htaccess')

set :shared_host_password, '3vCtrq0l'
set :shared_host_path, "/home/serwer1839697/public_html/piotrbienias/"
set :shared_host_user, "serwer1839697"
set :shared_host_server, "serwer1839697.home.pl"
set :shared_current_path, "#{fetch(:shared_host_path)}current"

set :shared_delete_current, "sshpass -p 3vCtrq0l ssh #{fetch(:shared_host_user)}@#{fetch(:shared_host_server)} 'rm -rf ~/public_html/piotrbienias/current'"

set :rsync_options, '-l --recursive --rsh="/usr/bin/sshpass -p 3vCtrq0l ssh" -avz'

set :stage, :production

set :repo_url, 'git@github.com:piotrbienias/wp-vallume-theme.git'

set :deploy_to, -> { "/srv/var/www/blackballoon/#{fetch(:application)}/prod/" }

role :app, %w{pbienias@blackballoon.pl}
role :web, %w{pbienias@blackballoon.pl}

server 'blackballoon.pl', user: 'pbienias', roles: %w{app web}

set :ssh_options, {
    keys: %w(~/.ssh/bb_atman_rsa),
    forward_agent: true
}


namespace :deploy do
    desc 'rsync files from production server to shared server (home.pl)'
    task :rsync_to_shared do
        on roles(:web) do
            execute fetch(:shared_delete)
            execute :rsync, fetch(:rsync_options), fetch(:deploy_to), "#{fetch(:shared_host_user)}@#{fetch(:shared_host_server)}:#{fetch(:shared_host_path)}"
        end
    end
end


after 'deploy:publishing', 'deploy:rsync_to_shared'


fetch(:default_env).merge!(wp_env: :production)
