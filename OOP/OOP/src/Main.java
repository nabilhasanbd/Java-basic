public class Main {

        public static void main(String[] args) {

            Customer customer = new Customer("Nabil", 1000,
                    "nabil@email.com");
            System.out.println(customer.getName());
            System.out.println(customer.getCreditLimit());
            System.out.println(customer.getEmail());

            Customer secondCustomer = new Customer();
            secondCustomer.setName("nabillll");
            System.out.println(secondCustomer.getName());
            System.out.println(secondCustomer.getCreditLimit());
            System.out.println(secondCustomer.getEmail());

            Customer thirdCustomer = new Customer("Joy", "joy@email.com");
            System.out.println(thirdCustomer.getName());
            System.out.println(thirdCustomer.getCreditLimit());
            System.out.println(thirdCustomer.getEmail());
        }
}
