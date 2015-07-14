role :server, "csp.demo.learninghouse.com"
set :deploy_to, fetch(:dir, "/www/#{school}.demo.learninghouse.com")

set :user, 'tlhwebdev'
namespace :deploy do
    desc "Deploys code to the demo environment."
    after "deploy", :except => { :no_release => true } do
    	run "cd #{releases_path}/#{release_name} && sed -ie s/local/demo/ ./wwwroot/index.php"
  	end
    after "deploy", "deploy:cleanup"
end
