public class Main {
    public static void main(String[] args) {
        House blueHouse = new House("blue");
        House anotherHouse = blueHouse; // Here no new object is created. anotherHouse is a referencing to the object blueHouse

        System.out.println(blueHouse.getColor()); //blue
        System.out.println(anotherHouse.getColor()); //blue

        anotherHouse.setColor("Red");
        System.out.println(anotherHouse.getColor()); //red
        System.out.println(blueHouse.getColor()); // red

        House greenHouse = new House("green");
        anotherHouse = greenHouse;

        System.out.println(blueHouse.getColor()); //red
        System.out.println(anotherHouse.getColor()); // green
        System.out.println(greenHouse.getColor()); // green

    }
}
