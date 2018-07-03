set :application, 'dev_wp'
set :repo_url, 'git@github.com:piotrbienias/wp-vallume-theme.git'


# Set branch to master
set :branch, :master

set :deploy_to, -> { "/srv/var/www/blackballoon/#{fetch(:application)}" }

set :log_level, :info

set :linked_files, fetch(:linked_files, []).push('.env')
set :linked_dirs, fetch(:linked_dirs, []).push('web/app/uploads')
