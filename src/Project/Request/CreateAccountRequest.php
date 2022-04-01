<?php
/*
 * Copyright 2016 Game Server Services, Inc. or its affiliates. All Rights
 * Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *  http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

namespace Gs2\Project\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class CreateAccountRequest extends Gs2BasicRequest {
    /** @var string */
    private $email;
    /** @var string */
    private $fullName;
    /** @var string */
    private $companyName;
    /** @var string */
    private $password;
    /** @var string */
    private $lang;

	public function getEmail(): ?string {
		return $this->email;
	}

	public function setEmail(?string $email) {
		$this->email = $email;
	}

	public function withEmail(?string $email): CreateAccountRequest {
		$this->email = $email;
		return $this;
	}

	public function getFullName(): ?string {
		return $this->fullName;
	}

	public function setFullName(?string $fullName) {
		$this->fullName = $fullName;
	}

	public function withFullName(?string $fullName): CreateAccountRequest {
		$this->fullName = $fullName;
		return $this;
	}

	public function getCompanyName(): ?string {
		return $this->companyName;
	}

	public function setCompanyName(?string $companyName) {
		$this->companyName = $companyName;
	}

	public function withCompanyName(?string $companyName): CreateAccountRequest {
		$this->companyName = $companyName;
		return $this;
	}

	public function getPassword(): ?string {
		return $this->password;
	}

	public function setPassword(?string $password) {
		$this->password = $password;
	}

	public function withPassword(?string $password): CreateAccountRequest {
		$this->password = $password;
		return $this;
	}

	public function getLang(): ?string {
		return $this->lang;
	}

	public function setLang(?string $lang) {
		$this->lang = $lang;
	}

	public function withLang(?string $lang): CreateAccountRequest {
		$this->lang = $lang;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateAccountRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateAccountRequest())
            ->withEmail(array_key_exists('email', $data) && $data['email'] !== null ? $data['email'] : null)
            ->withFullName(array_key_exists('fullName', $data) && $data['fullName'] !== null ? $data['fullName'] : null)
            ->withCompanyName(array_key_exists('companyName', $data) && $data['companyName'] !== null ? $data['companyName'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withLang(array_key_exists('lang', $data) && $data['lang'] !== null ? $data['lang'] : null);
    }

    public function toJson(): array {
        return array(
            "email" => $this->getEmail(),
            "fullName" => $this->getFullName(),
            "companyName" => $this->getCompanyName(),
            "password" => $this->getPassword(),
            "lang" => $this->getLang(),
        );
    }
}