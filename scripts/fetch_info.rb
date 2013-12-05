require 'mechanize'
require 'json'

base = "http://www.designersremix.com/dk/"
urls = ["tilda-coat-7012.html", "marley-dress-13075.html", "akita-coat-6941.html", "mariaa-skirt-7102.html"]

agent = Mechanize.new { |a| a.user_agent = 'Mac Safari' }
results = []

class Mechanize::Page
  def strip_search(selector)
    search = search selector
    if search.size > 1
      search.map { |item| item.inner_text.strip }
    else
      search.inner_text.strip
    end
  end

  def zip_selectors(*selectors)
    stripped = selectors.map { |s| strip_search s }
    stripped.shift.zip(*stripped)
  end
end

urls.each do |url|
  puts "Visiting #{url}"
  page = agent.get(base + url)

  info = page.strip_search('.price')
  info = info.last if info.respond_to? :last
  price = info.gsub(/(DKK |,)/, '')

  results << {
    name: page.strip_search('.product-name'),
    price: price,
    short_description: page.strip_search('.short-description'),
    description: page.strip_search('#tabs-1'),
    additional_info: page.zip_selectors('th.label', 'td.data')
  }
end

json = { products: results }.to_json

if (ENV['PRINT'])
  puts json
else
  File.open 'products.json', 'w' do |f|
    f.write json
  end
end
