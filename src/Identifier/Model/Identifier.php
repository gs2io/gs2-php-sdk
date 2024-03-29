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
	/**
     * @var int
	 */
	private $revision;
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
	public function getRevision(): ?int {
		return $this->revision;
	}
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
	public function withRevision(?int $revision): Identifier {
		$this->revision = $revision;
		return $this;
	}

    public static function fromJson(?array $data): ?Identifier {
        if ($data === null) {
            return null;
        }
        return (new Identifier())
            ->withClientId(array_key_exists('clientId', $data) && $data['clientId'] !== null ? $data['clientId'] : null)
            ->withUserName(array_key_exists('userName', $data) && $data['userName'] !== null ? $data['userName'] : null)
            ->withClientSecret(array_key_exists('clientSecret', $data) && $data['clientSecret'] !== null ? $data['clientSecret'] : null)
            ->withCreatedAt(array_key_exists('createdAt', $data) && $data['createdAt'] !== null ? $data['createdAt'] : null)
            ->withRevision(array_key_exists('revision', $data) && $data['revision'] !== null ? $data['revision'] : null);
    }

    public function toJson(): array {
        return array(
            "clientId" => $this->getClientId(),
            "userName" => $this->getUserName(),
            "clientSecret" => $this->getClientSecret(),
            "createdAt" => $this->getCreatedAt(),
            "revision" => $this->getRevision(),
        );
    }
}