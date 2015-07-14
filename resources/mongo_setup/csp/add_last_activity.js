var x = new Mongo('127.0.0.1:27017');
var mydb = x.getDB('csp');
var count = mydb.messages.find().count();
var cur = mydb.messages.find();

print("Updating: " + count + " messages.");
cur.forEach(function(x){
	last_activity = x.ts;
	print("Message was sent at: "+x.ts);
	if(x.replies) {
		x.replies.forEach(function(rep){
			if(rep.ts > x.ts) {
				last_activity = rep.ts;
				print("Replied to at: " + rep.ts);
			}
		});
	}
	mydb.messages.update({"_id":x._id}, {$set:{"last_activity":last_activity}});
});

print("Update completed at "+Date.now()+".");