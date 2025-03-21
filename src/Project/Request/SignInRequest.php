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

class SignInRequest extends Gs2BasicRequest {
    /** @var string */
    private $email;
    /** @var string */
    private $password;
    /** @var string */
    private $otp;
	public function getEmail(): ?string {
		return $this->email;
	}
	public function setEmail(?string $email) {
		$this->email = $email;
	}
	public function withEmail(?string $email): SignInRequest {
		$this->email = $email;
		return $this;
	}
	public function getPassword(): ?string {
		return $this->password;
	}
	public function setPassword(?string $password) {
		$this->password = $password;
	}
	public function withPassword(?string $password): SignInRequest {
		$this->password = $password;
		return $this;
	}
	public function getOtp(): ?string {
		return $this->otp;
	}
	public function setOtp(?string $otp) {
		$this->otp = $otp;
	}
	public function withOtp(?string $otp): SignInRequest {
		$this->otp = $otp;
		return $this;
	}

    public static function fromJson(?array $data): ?SignInRequest {
        if ($data === null) {
            return null;
        }
        return (new SignInRequest())
            ->withEmail(array_key_exists('email', $data) && $data['email'] !== null ? $data['email'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withOtp(array_key_exists('otp', $data) && $data['otp'] !== null ? $data['otp'] : null);
    }

    public function toJson(): array {
        return array(
            "email" => $this->getEmail(),
            "password" => $this->getPassword(),
            "otp" => $this->getOtp(),
        );
    }
}