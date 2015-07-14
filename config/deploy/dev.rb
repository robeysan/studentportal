role :server, "csp.dev.learninghouse.com"
set :deploy_to, fetch(:dir, "/www/#{school}.dev.learninghouse.com")

set :user, 'tlhwebdev'
namespace :deploy do
    desc "Deploys code to the dev environment."
    after "deploy", :except => { :no_release => true } do
    	run "cd #{releases_path}/#{release_name} && sed -ie s/local/dev/ ./wwwroot/index.php"
  	end
    after "deploy", "deploy:cleanup"
end