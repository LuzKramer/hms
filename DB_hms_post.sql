CREATE DATABASE hms;

CREATE TABLE bloods (
    blood SERIAL PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE diseases (
    disease SERIAL PRIMARY KEY,
    name VARCHAR(255),
    symptoms TEXT
);

CREATE TABLE product_cats (
    product_cat SERIAL PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE companies (
    company SERIAL PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE room_types (
    room_type SERIAL PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE blocks (
    block SERIAL PRIMARY KEY,
    name VARCHAR(255),
    map VARCHAR(255)
);

CREATE TABLE actions (
    action SERIAL PRIMARY KEY,
    name VARCHAR(255)
);

CREATE TABLE jobs (
    job SERIAL PRIMARY KEY,
    name VARCHAR(255),
    descript TEXT
);

CREATE TABLE specializations (
    specialization SERIAL PRIMARY KEY,
    name VARCHAR(255),
    descript TEXT
);

CREATE TABLE rooms (
    room SERIAL PRIMARY KEY,
    name VARCHAR(255),
    room_type INT,
    capacity INT,
    occupied BOOLEAN,
    block INT,
    floor INT,
    descript TEXT,
    FOREIGN KEY (room_type) REFERENCES room_types(room_type),
    FOREIGN KEY (block) REFERENCES blocks(block)
);

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
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
>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386
    FOREIGN KEY (job) REFERENCES jobs(job),
    FOREIGN KEY (specialization) REFERENCES specializations(specialization)
);

>>>>>>> 788c06477a1843536f63b58b5cd3a3ba787b8386
CREATE TABLE patients (
    patient SERIAL PRIMARY KEY,
    sex VARCHAR(1),
    born DATE,
    monitoring VARCHAR(255),
    urgency INT,
    room INT,
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
    temperature DECIMAL(5, 2),
    weight DECIMAL (5, 2),
    height INT,
    heart_rate INT,
    medical_history TEXT,
    observations TEXT,
    discharge BOOLEAN,
    medic INT,
    ai_resp TEXT,
    FOREIGN KEY (medic) REFERENCES users(id),
    FOREIGN KEY (room) REFERENCES rooms(room),
    FOREIGN KEY (blood) REFERENCES bloods(blood)
);

CREATE TABLE products (
    product SERIAL PRIMARY KEY,
    product_cat INT,
    quantity INT,
    sellprice BOOLEAN,
    price BOOLEAN,
    name VARCHAR(255),
    descript TEXT,
    exp_date DATE,
    company INT,
    generic BOOLEAN,
    FOREIGN KEY (product_cat) REFERENCES product_cats(product_cat),
    FOREIGN KEY (company) REFERENCES companies(company)
);

CREATE TABLE shifts (
    shift SERIAL PRIMARY KEY,
    date DATE,
    hour TIME,
    worker INT,
    descript TEXT,
    FOREIGN KEY (worker) REFERENCES users(id)
);

CREATE TABLE exams (
    id SERIAL PRIMARY KEY,
    patient INT,
    descript TEXT,
    mrequest INT,
    mresponsable INT,
    datetime TIMESTAMP,
    FOREIGN KEY (mrequest) REFERENCES users(id),
    FOREIGN KEY (mresponsable) REFERENCES users(id),
    FOREIGN KEY (patient) REFERENCES patients(patient)
);

CREATE TABLE examsimgs (
    id SERIAL PRIMARY KEY,
    exam INT,
    img VARCHAR(255),
    FOREIGN KEY (exam) REFERENCES exams(id)
);

CREATE TABLE medications (
    medication SERIAL PRIMARY KEY,
    patient INT,
    worker INT,
    descript TEXT,
    datetime TIMESTAMP,
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (worker) REFERENCES users(id)
);

CREATE TABLE prescriptions (
    medication SERIAL PRIMARY KEY,
    patient INT,
    worker INT,
    descript TEXT,
    concluded BOOLEAN,
    datetime TIMESTAMP,
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (worker) REFERENCES users(id)

);

CREATE TABLE diagnostics (
    diagnostic SERIAL PRIMARY KEY,
    patient INT,
    descript TEXT,
    disease INT,
    date DATE,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (disease) REFERENCES diseases(disease)
);

CREATE TABLE cares (
    care SERIAL PRIMARY KEY,
    action INT,
    patient INT,
    worker INT,
    hour TIME,
    ok BOOLEAN,
    FOREIGN KEY (action) REFERENCES actions(action),
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (worker) REFERENCES users(id)
);

CREATE TABLE requests(
    request SERIAL PRIMARY KEY,
    date DATE,
    hour TIME,
    worker INT,
    done BOOLEAN,
    FOREIGN KEY (worker) REFERENCES users(id)
);

CREATE TABLE products_requests (
    product_request SERIAL PRIMARY KEY,
    product INT,
    request INT,
    quantity INT,
    FOREIGN KEY (product) REFERENCES products(product),
    FOREIGN KEY (request) REFERENCES requests(request)
);

CREATE TABLE consults (
    consult SERIAL PRIMARY KEY,
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
    surgery SERIAL PRIMARY KEY,
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
    visitor SERIAL PRIMARY KEY,
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
    used_room SERIAL PRIMARY KEY,
    room INT,
    patient INT,
    hour TIME,
    date DATE,
    FOREIGN KEY (patient) REFERENCES patients(patient),
    FOREIGN KEY (room) REFERENCES rooms(room)
);

CREATE TABLE calls (
    call SERIAL PRIMARY KEY,
    patient INT,
    date DATE,
    FOREIGN KEY (patient) REFERENCES patients(patient)
);

CREATE TABLE incomes(
    income SERIAL PRIMARY KEY,
    descript TEXT,
    value int,
    date DATE
);

CREATE TABLE expenses(
    expense SERIAL PRIMARY KEY,
    descript TEXT,
    value INT,
    date DATE
);
