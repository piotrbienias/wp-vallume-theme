# Load DSL and Setup Up Stages
require 'capistrano/setup'

# Includes default deployment tasks
require 'capistrano/deploy'

# Load tasks from gems
require 'capistrano/composer'

# Load tasks from Capistrano WPCLI
require 'capistrano/wpcli'

# Loads custom tasks from `lib/capistrano/tasks' if you have any defined.
# Customize this path to change the location of your custom tasks.
Dir.glob('config/tasks/*.rake').each { |r| import r }
