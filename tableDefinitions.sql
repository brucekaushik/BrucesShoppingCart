create table ShoppingCartProducts (
product_id int unsigned auto_increment primary key,
sku varchar(100),
product_name varchar(100),
description varchar(2000),
image_url varchar(100),
active varchar(3),
size varchar(100),
color varchar(100),
price float(10,2),
shipping_charge float(10,2),
category varchar(50)
);

create table ShoppingCartOrders (
order_id int unsigned auto_increment primary key,
customer_id int,
shopping_type varchar(20),
billing_customer_name varchar(50),
billing_company_name varchar(50),
billing_address varchar(100),
billing_city varchar(50),
billing_state varchar(20),
billing_postal_code varchar(10),
billing_country varchar(50),
billing_phone varchar(20),
billing_email varchar(100),
shipping_customer_name varchar(50),
shipping_company_name varchar(50),
shipping_address varchar(100),
shipping_city varchar(50),
shipping_state varchar(20),
shipping_postal_code varchar(10),
shipping_country varchar(50),
shipping_phone varchar(20),
shipping_email varchar(100),
cc_type varchar(100),
cc_name varchar(100),
cc_number varchar(20),
cc_exp_month varchar(20),
cc_exp_year varchar(20),
cc_email varchar(100),
cc_phone varchar(30),
cc_address01 varchar(100),
cc_address02 varchar(100),
cc_city varchar(100),
cc_state varchar(5),
cc_postal_code varchar(10),
cc_country varchar(100),
order_subtotal float(10,2),
shipping_charge float(10,2),
tax_charge float(10,2),
misc_charge float(10,2),
order_grand_total float(10,2),
order_date date,
order_time timestamp,
payment_method varchar(20),
comments text,
message text,
processed varchar(3),
complete varchar(3)
);


create table ShoppingCartOrderItems (
orderitem_id int unsigned auto_increment primary key,
order_id int,
orderitem_product_id int,
product_name text,
price float(10,2),
description text,
qty_ordered int,
taxable varchar(3),
tax_rate float(10,2),
oi_shipping_charge float(10,2),
oi_tax_charge float(10,2),
oi_misc_charge float(10,2),
special_instructions text
)




