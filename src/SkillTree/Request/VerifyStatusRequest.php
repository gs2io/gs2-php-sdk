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

namespace Gs2\SkillTree\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for verifyStatus: Verify Status
 *
 * @see https://docs.gs2.io/api_reference/skill_tree/sdk/#verifystatus
 */
class VerifyStatusRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Property ID */
    private $propertyId;
    /** @var string Node Model name */
    private $nodeModelName;
    /** @var string Type of verification */
    private $verifyType;
    /** @var string */
    private $duplicationAvoider;
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
     * @return VerifyStatusRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyStatusRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
    /** @param string|null $accessToken User ID */
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
    /**
     * @param string|null $accessToken User ID
     * @return VerifyStatusRequest
     */
	public function withAccessToken(?string $accessToken): VerifyStatusRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return VerifyStatusRequest
     */
	public function withPropertyId(?string $propertyId): VerifyStatusRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
    /** @return string|null Node Model name */
	public function getNodeModelName(): ?string {
		return $this->nodeModelName;
	}
    /** @param string|null $nodeModelName Node Model name */
	public function setNodeModelName(?string $nodeModelName) {
		$this->nodeModelName = $nodeModelName;
	}
    /**
     * @param string|null $nodeModelName Node Model name
     * @return VerifyStatusRequest
     */
	public function withNodeModelName(?string $nodeModelName): VerifyStatusRequest {
		$this->nodeModelName = $nodeModelName;
		return $this;
	}
    /** @return string|null Type of verification */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Type of verification */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Type of verification
     * @return VerifyStatusRequest
     */
	public function withVerifyType(?string $verifyType): VerifyStatusRequest {
		$this->verifyType = $verifyType;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyStatusRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyStatusRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyStatusRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withNodeModelName(array_key_exists('nodeModelName', $data) && $data['nodeModelName'] !== null ? $data['nodeModelName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "propertyId" => $this->getPropertyId(),
            "nodeModelName" => $this->getNodeModelName(),
            "verifyType" => $this->getVerifyType(),
        );
    }
}