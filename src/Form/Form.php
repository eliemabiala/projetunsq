<?php

namespace App\Form;
// namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserController extends AbstractController
{
    #[Route('/register', name: 'user_register')]
    public function register(Request $request): Response
    {
        $form = $this->createFormBuilder()
            ->add('name', TextType::class, ['label' => 'Name'])
            ->add('postname', TextType::class, ['label' => 'Post Name'])
            ->add('first_name', TextType::class, ['label' => 'First Name'])
            ->add('date_of_birth', DateType::class, ['widget' => 'single_text', 'label' => 'Date of Birth'])
            ->add('sexe', ChoiceType::class, [
                'choices'  => [
                    'Male' => 'male',
                    'Female' => 'female',
                ],
                'label' => 'Sexe'
            ])
            ->add('phone', TextType::class, ['label' => 'Phone'])
            ->add('email', EmailType::class, ['label' => 'Email'])
            ->add('role', TextType::class, ['label' => 'Role'])
            ->add('teams', TextType::class, ['label' => 'Teams'])
            ->add('password', PasswordType::class, ['label' => 'Password'])
            ->add('number_passport', TextType::class, ['label' => 'Number Passport'])
            ->add('date_expiration', DateType::class, ['widget' => 'single_text', 'label' => 'Date Expiration'])
            ->add('nationalite', TextType::class, ['label' => 'Nationalité'])
            ->add('profession', TextType::class, ['label' => 'Profession'])
            ->add('address', TextType::class, ['label' => 'Address'])
            ->add('status_demarches', TextType::class, ['label' => 'Status Demarches'])
            ->add('date_creation', DateType::class, ['widget' => 'single_text', 'label' => 'Date Creation'])
            ->add('date_inscrit', DateType::class, ['widget' => 'single_text', 'label' => 'Date Inscrit'])
            ->add('save', SubmitType::class, ['label' => 'Register'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Handle form submission, e.g. save data to the database
        }

        return $this->render('user/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
