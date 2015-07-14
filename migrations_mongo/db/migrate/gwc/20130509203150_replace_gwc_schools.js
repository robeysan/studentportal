var migration = {
  up: function() {
  	db.schools.drop();
  },
  down: function() {
  	db.schools.drop();
  }
};

migration[target].call();
