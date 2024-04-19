CREATE DATABASE hms;

CREATE TABLE bloods (
    blood INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE diseases (
    disease INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    symptoms TEXT
);

CREATE TABLE product_cats (
    product_cat INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE companies (
    company INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE room_types (
    room_type INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE blocks (
    block INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    map VARCHAR(255)
);

CREATE TABLE actions (
    action INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE jobs (
    job INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    descript TEXT
);

CREATE TABLE specializations (
    specialization INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    descript TEXT
);

CREATE TABLE rooms (
    room INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    room_type INT,
    occupied BOOLEAN,
    block INT,
    floor INT,
    descript TEXT,
    FOREIGN KEY (room_type) REFERENCES room_types(room_type),
    FOREIGN KEY (block) REFERENCES blocks(block)
);

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255),
    email_verified_at TIMESTAMP,
    remember_token VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    job INT,
    specialization INT,
    salary INT,
    descript TEXT,
    level INT,
    cpf VARCHAR(11) UNIQUE,
    fone INT,
    img VARCHAR(255),
    FOREIGN KEY (job) REFERENCES jobs(job),
    FOREIGN KEY (specialization) REFERENCES specializations(specialization)
);

CREATE TABLE patients (
    patient  INT AUTO_INCREMENT PRIMARY KEY,
    sex VARCHAR(1),
    born DATE,
    monitoring VARCHAR(255),
    urgency INT,
    name VARCHAR(255),
    cpf VARCHAR(14) UNIQUE,
    codsus INT UNIQUE,
    needcare BOOLEAN,
    fone VARCHAR(15),
    email VARCHAR(255),
    img VARCHAR(255),
    blood INT,
    datetime TIMESTAMP,
    symptoms TEXT,
    systolic_pressure INT,
    diastolic_pressure INT,
    temperature DECIMAL(5,2),
    heart_rate INT,
    medical_history TEXT,
    observations TEXT,
    ai_resp TEXT,
    FOREIGN KEY (blood) REFERENCES bloods(blood)
);

CREATE TABLE products (
    product INT AUTO_INCREMENT PRIMARY KEY,
    product_cat INT,
    quantity INT,
    sellprice INT,
    price INT,
    name VARCHAR(255),
    descript TEXT,
    exp_date DATE,
    company INT,
    generic INT,
    FOREIGN KEY (product_cat) REFERENCES product_cats(product_cat),
    FOREIGN KEY (company) REFERENCES companies(company)
);

CREATE TABLE shifts (
    shift INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    hour TIME,
    worker INT,
    descript TEXT,
    FOREIGN KEY (worker) REFERENCES users(id)
);

CREATE TABLE medications (
    medication INT AUTO_INCREMENT PRIMARY KEY,
    patient INT,
    product INT,
    worker INT,
    descript TEXT,
    date DATE,
    hour TIME,
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (product) REFERENCES products(product),
    FOREIGN KEY (worker) REFERENCES users(id)
);

CREATE TABLE diagnostics (
    diagnostic INT AUTO_INCREMENT PRIMARY KEY,
    patient INT,
    descript TEXT,
    disease INT,
    user_id INT
    date DATE,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (disease) REFERENCES diseases(disease)
);



CREATE TABLE cares (
    care INT AUTO_INCREMENT PRIMARY KEY,
    action INT,
    patient INT,
    worker INT,
    hour TIME,
    ok INT,
    FOREIGN KEY (action) REFERENCES actions(action),
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (worker) REFERENCES users(id)
);

CREATE TABLE requests(
    request INT AUTO_INCREMENT PRIMARY KEY,
    date DATE,
    hour TIME,
    worker INT,
    done BOOLEAN,
    FOREIGN KEY (worker) REFERENCES users(id)
);

CREATE TABLE products_requests (
    product_request INT AUTO_INCREMENT PRIMARY KEY,
    product INT,
    request INT,
    quantity INT,
    FOREIGN KEY (product) REFERENCES products(product),
    FOREIGN KEY (request) REFERENCES requests(request)
);

CREATE TABLE consults (
    consult INT AUTO_INCREMENT PRIMARY KEY,
    patient INT,
    worker INT,
    date DATE,
    hour TIME,
    room INT,
    ok BOOLEAN,
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (worker) REFERENCES users(id),
    FOREIGN KEY (room) REFERENCES rooms(room)
);

CREATE TABLE surgeries (
    surgery INT AUTO_INCREMENT PRIMARY KEY,
    worker INT,
    patient INT,
    room INT,
    hour TIME,
    date DATE,
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (worker) REFERENCES users(id),
    FOREIGN KEY (room) REFERENCES rooms(room)
);

CREATE TABLE visitors (
    visitor INT AUTO_INCREMENT PRIMARY KEY,
    person_name VARCHAR(255),
    patient INT,
    date DATE,
    hour TIME,
    are BOOLEAN,
    room INT,
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (room) REFERENCES rooms(room)
);

CREATE TABLE used_rooms (
    used_room INT AUTO_INCREMENT PRIMARY KEY,
    room INT,
    patient INT,
    hour TIME,
    date DATE,
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (room) REFERENCES rooms(room)
);

CREATE TABLE calls (
    call INT AUTO_INCREMENT PRIMARY KEY,
    patient INT,
    date DATE,
    FOREIGN KEY (patient) REFERENCES patients(patient)
);

CREATE TABLE incomes(
    income INT AUTO_INCREMENT PRIMARY KEY,
    descript TEXT,
    value INT,
    date DATE
);

CREATE TABLE expenses(
    expense INT AUTO_INCREMENT PRIMARY KEY,
    descript TEXT,
    value INT,
    date DATE
);
