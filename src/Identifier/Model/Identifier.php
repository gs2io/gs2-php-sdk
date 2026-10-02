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


/**
 * Credential
 *
 * @see https://docs.gs2.io/api_reference/identifier/sdk/#identifier
 */
class Identifier implements IModel {
	/**
     * @var string Client ID
	 */
	private $clientId;
	/**
     * @var string User Name
	 */
	private $userName;
	/**
     * @var string Client Secret
	 */
	private $clientSecret;
	/**
     * @var int Creation Timestamp
	 */
	private $createdAt;
	/**
     * @var int Revision
	 */
	private $revision;
    /** @return string|null Client ID */
	public function getClientId(): ?string {
		return $this->clientId;
	}
    /** @param string|null $clientId Client ID */
	public function setClientId(?string $clientId) {
		$this->clientId = $clientId;
	}
    /**
     * @param string|null $clientId Client ID
     * @return Identifier
     */
	public function withClientId(?string $clientId): Identifier {
		$this->clientId = $clientId;
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
     * @return Identifier
     */
	public function withUserName(?string $userName): Identifier {
		$this->userName = $userName;
		return $this;
	}
    /** @return string|null Client Secret */
	public function getClientSecret(): ?string {
		return $this->clientSecret;
	}
    /** @param string|null $clientSecret Client Secret */
	public function setClientSecret(?string $clientSecret) {
		$this->clientSecret = $clientSecret;
	}
    /**
     * @param string|null $clientSecret Client Secret
     * @return Identifier
     */
	public function withClientSecret(?string $clientSecret): Identifier {
		$this->clientSecret = $clientSecret;
		return $this;
	}
    /** @return int|null Creation Timestamp */
	public function getCreatedAt(): ?int {
		return $this->createdAt;
	}
    /** @param int|null $createdAt Creation Timestamp */
	public function setCreatedAt(?int $createdAt) {
		$this->createdAt = $createdAt;
	}
    /**
     * @param int|null $createdAt Creation Timestamp
     * @return Identifier
     */
	public function withCreatedAt(?int $createdAt): Identifier {
		$this->createdAt = $createdAt;
		return $this;
	}
    /** @return int|null Revision */
	public function getRevision(): ?int {
		return $this->revision;
	}
    /** @param int|null $revision Revision */
	public function setRevision(?int $revision) {
		$this->revision = $revision;
	}
    /**
     * @param int|null $revision Revision
     * @return Identifier
     */
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