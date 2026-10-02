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

/** Request for getProjectTokenByIdentifier: Issue project tokens */
class GetProjectTokenByIdentifierRequest extends Gs2BasicRequest {
    /** @var string GS2 Account Name */
    private $accountName;
    /** @var string Project Name */
    private $projectName;
    /** @var string User Name */
    private $userName;
    /** @var string Password */
    private $password;
    /** @var string Passcode */
    private $otp;
    /** @return string|null GS2 Account Name */
	public function getAccountName(): ?string {
		return $this->accountName;
	}
    /** @param string|null $accountName GS2 Account Name */
	public function setAccountName(?string $accountName) {
		$this->accountName = $accountName;
	}
    /**
     * @param string|null $accountName GS2 Account Name
     * @return GetProjectTokenByIdentifierRequest
     */
	public function withAccountName(?string $accountName): GetProjectTokenByIdentifierRequest {
		$this->accountName = $accountName;
		return $this;
	}
    /** @return string|null Project Name */
	public function getProjectName(): ?string {
		return $this->projectName;
	}
    /** @param string|null $projectName Project Name */
	public function setProjectName(?string $projectName) {
		$this->projectName = $projectName;
	}
    /**
     * @param string|null $projectName Project Name
     * @return GetProjectTokenByIdentifierRequest
     */
	public function withProjectName(?string $projectName): GetProjectTokenByIdentifierRequest {
		$this->projectName = $projectName;
		return $this;
	}
    /** @return string|null User Name */
	public function getUserName(): ?string {
		return $this->userName;
	}
    /** @param string|null $userName User Name */
	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}
    /**
     * @param string|null $userName User Name
     * @return GetProjectTokenByIdentifierRequest
     */
	public function withUserName(?string $userName): GetProjectTokenByIdentifierRequest {
		$this->userName = $userName;
		return $this;
	}
    /** @return string|null Password */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password
     * @return GetProjectTokenByIdentifierRequest
     */
	public function withPassword(?string $password): GetProjectTokenByIdentifierRequest {
		$this->password = $password;
		return $this;
	}
    /** @return string|null Passcode */
	public function getOtp(): ?string {
		return $this->otp;
	}
    /** @param string|null $otp Passcode */
	public function setOtp(?string $otp) {
		$this->otp = $otp;
	}
    /**
     * @param string|null $otp Passcode
     * @return GetProjectTokenByIdentifierRequest
     */
	public function withOtp(?string $otp): GetProjectTokenByIdentifierRequest {
		$this->otp = $otp;
		return $this;
	}

    public static function fromJson(?array $data): ?GetProjectTokenByIdentifierRequest {
        if ($data === null) {
            return null;
        }
        return (new GetProjectTokenByIdentifierRequest())
            ->withAccountName(array_key_exists('accountName', $data) && $data['accountName'] !== null ? $data['accountName'] : null)
            ->withProjectName(array_key_exists('projectName', $data) && $data['projectName'] !== null ? $data['projectName'] : null)
            ->withUserName(array_key_exists('userName', $data) && $data['userName'] !== null ? $data['userName'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withOtp(array_key_exists('otp', $data) && $data['otp'] !== null ? $data['otp'] : null);
    }

    public function toJson(): array {
        return array(
            "accountName" => $this->getAccountName(),
            "projectName" => $this->getProjectName(),
            "userName" => $this->getUserName(),
            "password" => $this->getPassword(),
            "otp" => $this->getOtp(),
        );
    }
}