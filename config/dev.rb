set :branch, "master"
set :web_directory, "/var/vhosts/www"
set :mysql_db, "your_mysql_db"
set :mysql_user, "your_mysql_user"
set :mysql_pass, "your_mysql_pass"
 
namespace :deploy do
    desc "Deploys code to the production environment."
    task :default, :roles => :server, :except => { :no_release => true } do
        run [
            "cd #{web_directory}",
            "git reset --hard",
            "git checkout #{branch}",
            "git fetch",
            "git pull origin #{branch}" ].join("; ")
    end
end