role :server, "csp.qa.learninghouse.com"
set :deploy_to, fetch(:dir, "/www/#{school}.qa.learninghouse.com")

set :user, 'qadmin'
namespace :deploy do
    desc "Deploys code to the qa environment."
    after "deploy", :except => { :no_release => true } do
    	run "cd #{releases_path}/#{release_name} && sed -ie s/local/qa/ ./wwwroot/index.php"
        # Used to change out Trad app program ID
    	run "cd #{releases_path}/#{release_name} && sed -ie s/2235/2232/ ./code_igniter/application/views/csp/apply_now_trad.php"
    	run "cd #{releases_path}/#{release_name} && sed -ie s/2235/2232/ ./code_igniter/application/libraries/csp.php"
    	run "cd #{releases_path}/#{release_name} && sed -ie s/2283/2296/ ./code_igniter/application/libraries/tuc.php"
  	end
    after "deploy", "deploy:cleanup"
end
