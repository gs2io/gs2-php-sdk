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

namespace Gs2\Identifier\Model;

use Gs2\Core\Model\IModel;


class Identifier implements IModel {
	/**
     * @var string
	 */
	private $clientId;
	/**
     * @var string
	 */
	private $userName;
	/**
     * @var string
	 */
	private $clientSecret;
	/**
     * @var int
	 */
	private $createdAt;

	public function getClientId(): ?string {
		return $this->clientId;
	}

	public function setClientId(?string $clientId) {
		$this->clientId = $clientId;
	}

	public function withClientId(?string $clientId): Identifier {
		$this->clientId = $clientId;
		return $this;
	}

	public function getUserName(): ?string {
		return $this->userName;
	}

	public function setUserName(?string $userName) {
		$this->userName = $userName;
	}

	public function withUserName(?string $userName): Identifier {
		$this->userName = $userName;
		return $this;
	}

	public function getClientSecret(): ?string {
		return $this->clientSecret;
	}

	public function setClientSecret(?string $clientSecret) {
		$this->clientSecret = $clientSecret;
	}

	public function withClientSecret(?string $clientSecret): Identifier {
		$this->clientSecret = $clientSecret;
		return $this;
	}

	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}

	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}

	public function withCreatedAt(?int $createdAt): Identifier {
		$this->createdAt = $createdAt;
		return $this;
	}

    public static function fromJson(?array $data): ?Identifier {
        if ($data === null) {
            return null;
        }
        return (new Identifier())
            ->withClientId(empty($data['clientId']) ? null : $data['clientId'])
            ->withUserName(empty($data['userName']) ? null : $data['userName'])
            ->withClientSecret(empty($data['clientSecret']) ? null : $data['clientSecret'])
            ->withCreatedAt(empty($data['createdAt']) ? null : $data['createdAt']);
    }

    public function toJson(): array {
        return array(
            "clientId" => $this->getClientId(),
            "userName" => $this->getUserName(),
            "clientSecret" => $this->getClientSecret(),
            "createdAt" => $this->getCreatedAt(),
        );
    }
}