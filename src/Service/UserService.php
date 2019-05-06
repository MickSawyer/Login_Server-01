<?php
/**
 * Created by Mohammad Al Kalaleeb.
 * User: Mohammad
 * Date: 5/6/2019
 * Time: 6:51 PM
 */

namespace App\Service;

use \Datetime;
use App\Entity\UserProfile;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserService
{
    private $em;
    private $encoder;

    public function __construct(EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $this->em = $em;
        $this->encoder = $encoder;
    }

    public function getUserByEmail($email)
    {
        $user = $this->em->getRepository('App:User')
            ->findOneBy(['email' => $email]);

        if ($user) {
            return $user;
        } else {
            return "No such user";
        }
    }

    public function getUserByUsername($username)
    {
        $user = $this->em->getRepository("App:User")
            ->findOneBy(["username" => $username]);

        if ($user) {
            return $user;
        } else {
            return "No such user";
        }
    }

    /**
     * @param $data
     *    $data = [
     *      "name" => (string) User name. Required.
     *      "password" => (string) User (plain) password. Required.
     *    ]
     * @return UserProfile|string User entity or string in case of error
     */
    public function createUser($data)
    {
        $email = $data["email"];
        $plainPassword = $data["password"];
        $full_name = $data["full_name"];
        $age = $data["age"];
        $username = $data["username"];
        $status = "Waiting Conformation";

        $user = new UserProfile();

        $user->setUserName($username);
        $user->setEmail($email);
        $user->setFullName($full_name);
        $encoded = password_hash($plainPassword, PASSWORD_DEFAULT);
        $user->setPassword($encoded);
        $user->setAge($age);
        $user->setStatus($status);

        $date = DateTime::createFromFormat('U', time());
        $user->setCreationDate($date);

        try {
            $this->em->persist($user);
            $this->em->flush();

            return $user;
        } catch (\Exception $ex) {
            return "Unable to create user";
        }
    }
}