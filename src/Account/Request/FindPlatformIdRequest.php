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

namespace Gs2\Account\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for findPlatformId: Find GS2-Account user ID by specifying External Platform Account ID
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#findplatformid
 */
class FindPlatformIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string GS2-Account User ID */
    private $accessToken;
    /** @var int Slot Number */
    private $type;
    /** @var string External Platform User ID */
    private $userIdentifier;
    /** @return string|null Namespace name */
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
    /** @param string|null $namespaceName Namespace name */
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
    /**
     * @param string|null $namespaceName Namespace name
     * @return FindPlatformIdRequest
     */
	public function withNamespaceName(?string $namespaceName): FindPlatformIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null GS2-Account User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken GS2-Account User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken GS2-Account User ID
     * @return FindPlatformIdRequest
     */
	public function withAccessToken(?string $accessToken): FindPlatformIdRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return int|null Slot Number */
	public function getType(): ?int {
		return $this->type;
	}
    /** @param int|null $type Slot Number */
	public function setType(?int $type) {
		$this->type = $type;
	}
    /**
     * @param int|null $type Slot Number
     * @return FindPlatformIdRequest
     */
	public function withType(?int $type): FindPlatformIdRequest {
		$this->type = $type;
		return $this;
	}
    /** @return string|null External Platform User ID */
	public function getUserIdentifier(): ?string {
		return $this->userIdentifier;
	}
    /** @param string|null $userIdentifier External Platform User ID */
	public function setUserIdentifier(?string $userIdentifier) {
		$this->userIdentifier = $userIdentifier;
	}
    /**
     * @param string|null $userIdentifier External Platform User ID
     * @return FindPlatformIdRequest
     */
	public function withUserIdentifier(?string $userIdentifier): FindPlatformIdRequest {
		$this->userIdentifier = $userIdentifier;
		return $this;
	}

    public static function fromJson(?array $data): ?FindPlatformIdRequest {
        if ($data === null) {
            return null;
        }
        return (new FindPlatformIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withUserIdentifier(array_key_exists('userIdentifier', $data) && $data['userIdentifier'] !== null ? $data['userIdentifier'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "type" => $this->getType(),
            "userIdentifier" => $this->getUserIdentifier(),
        );
    }
}