# require 'pathname'

# # Change symlinks from absolute to relative
# # Harcoded - we take current release, .env and uploads into consideration
# namespace :deploy do
#     task :create_relative_symlinks do
#         on roles(:web) do
#             # Path to TARGET files/directories
#             deploy_to_pathname = Pathname.new(deploy_to)
#             shared_env_pathname = Pathname.new("#{shared_path}/.env")
#             shared_uploads_pathname = Pathname.new("#{shared_path}/web/app/uploads")

#             # Where should the symlinks be placed
#             symlink_env_target = Pathname.new("#{release_path}/.env")
#             symlink_uploads_target = Pathname.new("#{release_path}/web/app/uploads")

#             # Symlinks should be relative to below path
#             env_symlink_pathname = Pathname.new(release_path)
#             uploads_symlink_pathname = Pathname.new("#{release_path}/web/app")

#             # Create relative pathnames
#             relative_latest_release = release_path.relative_path_from(deploy_to_pathname)
#             relative_env_pathname = shared_env_pathname.relative_path_from(env_symlink_pathname)
#             relative_uploads_pathname = shared_uploads_pathname.relative_path_from(uploads_symlink_pathname)

#             # Remove current symlinks and create new relative ones
#             execute "rm -f #{current_path} && ln -s #{relative_latest_release} #{current_path}"
#             execute "rm -f #{symlink_env_target} && ln -s #{relative_env_pathname} #{symlink_env_target}"
#             execute "rm -f #{symlink_uploads_target} && ln -s #{relative_uploads_pathname} #{symlink_uploads_target}"
#         end
#     end
# end

# Taken from https://stackoverflow.com/questions/31590392/capistrano-3-relative-symlink-instead-of-absolute-for-current-linked-dirs-and

Rake::Task['deploy:symlink:linked_dirs'].clear_actions
Rake::Task['deploy:symlink:linked_files'].clear_actions
Rake::Task['deploy:symlink:release'].clear_actions

namespace :deploy do
  namespace :symlink do
      desc 'Symlink release to current'
      task :release do
        on release_roles :all do
          tmp_current_path = release_path.parent.join(current_path.basename)
          execute :ln, '-s', release_path.relative_path_from(current_path.dirname), tmp_current_path
          execute :mv, tmp_current_path, current_path.parent
        end
      end
  
      desc 'Symlink files and directories from shared to release'
      task :shared do
        invoke 'deploy:symlink:linked_files'
        invoke 'deploy:symlink:linked_dirs'
      end
  
      desc 'Symlink linked directories'
      task :linked_dirs do
        next unless any? :linked_dirs
        on release_roles :all do
          execute :mkdir, '-p', linked_dir_parents(release_path)
  
          fetch(:linked_dirs).each do |dir|
            target = release_path.join(dir)
            source = shared_path.join(dir)
            unless test "[ -L #{target} ]"
              if test "[ -d #{target} ]"
                execute :rm, '-rf', target
              end
              execute :ln, '-s', source.relative_path_from(target.dirname), target
            end
          end
        end
      end
  
      desc 'Symlink linked files'
      task :linked_files do
        next unless any? :linked_files
        on release_roles :all do
          execute :mkdir, '-p', linked_file_dirs(release_path)
  
          fetch(:linked_files).each do |file|
            target = release_path.join(file)
            source = shared_path.join(file)
            unless test "[ -L #{target} ]"
              if test "[ -f #{target} ]"
                execute :rm, target
              end
              execute :ln, '-s', source.relative_path_from(target.dirname), target
            end
          end
        end
      end
    end
  end