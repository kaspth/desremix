require 'json'

start_id = 6
end_id = 19

results = []
start_id.upto end_id do |id|
  name = "Product#{id}"
  results << {
    id: id,
    name: name,
    price: 10_000 / id,
    description: "Rock the block with this dummy text about #{name.upcase}."
  }
end

File.open('results.json', 'w') do |f|
  f.write results.to_json
end