#call with cap -S dir="<dirname>" <environment> deploy
set :application, "student-portal"
set :repository,  "git@github.com:thelearninghouse/student-portal.git"

set :scm, :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `git`, `mercurial`, `perforce`, `subversion` or `none`

# use our keys, make sure we grab submodules, try to keep a remote cache
ssh_options[:forward_agent] = false
set :git_enable_submodules, 1
set :deploy_via, :remote_cache
set :use_sudo, false
set :keep_releases, 2

# Bonus! Colors are pretty!
def red(str)
  "\e[31m#{str}\e[0m"
end

# Figure out the name of the current local branch
def current_git_branch
  branch = `git symbolic-ref HEAD 2> /dev/null`.strip.gsub(/^refs\/heads\//, '')
  puts "Deploying branch #{red branch}"
  branch
end

set :branch, current_git_branch
school = Capistrano::CLI.ui.ask "Enter school domain (i.e. csp, aurora, etc): "

set :school, "#{school}"
set :stages, %w(dev dev2 demo qa)
set :default_stage, "dev"
require 'capistrano/ext/multistage'
