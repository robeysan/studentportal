role :server, "csp.dev2.learninghouse.com"
set :deploy_to, fetch(:dir, "/www/#{school}.dev2.learninghouse.com")

set :user, 'tlhwebdev'
namespace :deploy do
    desc "Deploys code to the dev2 environment."
    after "deploy", :except => { :no_release => true } do
    	run "cd #{releases_path}/#{release_name} && sed -ie s/local/dev2/ ./wwwroot/index.php"

        # Used to change out Trad app program ID
    	run "cd #{releases_path}/#{release_name} && sed -ie s/2235/2239/ ./code_igniter/application/views/csp/apply_now_trad.php"
    	run "cd #{releases_path}/#{release_name} && sed -ie s/2235/2239/ ./code_igniter/application/libraries/csp.php"
  	end
    after "deploy", "deploy:cleanup"
end
