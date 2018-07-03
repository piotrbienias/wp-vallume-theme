set :linked_files, fetch(:linked_files, []).push('config/nginx.conf')

set :stage, :staging

role :app, %w{pbienias@blackballoon.pl}

server 'blackballoon.pl', user: 'pbienias', roles: %w{app}

set :ssh_options, {
    keys: %w(~/.ssh/bb_atman_rsa),
    forward_agent: true
}

namespace :deploy do
    desc 'Reload php7.0-fpm service'
        task :reload_php do
            on roles(:app), in: :sequence, wait: 5 do
                execute :sudo, :systemctl, :reload, "php7.0-fpm.service"
        end
    end
end



# Reload PHP7.0 FPM after deploy
after 'deploy:publishing', 'deploy:reload_php'


fetch(:default_env).merge!(wp_env: :staging)
