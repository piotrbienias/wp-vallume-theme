set :application, 'dev_wp'


# Set branch to master
set :branch, :master

set :log_level, :debug

set :linked_files, fetch(:linked_files, []).push('.env')
set :linked_dirs, fetch(:linked_dirs, []).push('web/app/uploads')