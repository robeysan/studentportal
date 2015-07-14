var x = new Mongo('127.0.0.1:27017');
var mydb = x.getDB('test');
var numApplications = mydb.applications.find({"started_at":{$exists:false}, "complete":{$exists:true}}).count();
print(numApplications + " applications updated.");
