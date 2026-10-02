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

namespace Gs2\Stamina\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for setRecoverValueByStatus: Update stamina recovery amount using GS2-Experience status
 *
 * @see https://docs.gs2.io/api_reference/stamina/sdk/#setrecovervaluebystatus
 */
class SetRecoverValueByStatusRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Stamina Model Name */
    private $staminaName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Encryption Key GRN */
    private $keyId;
    /** @var string GS2-Experience status body to be signed */
    private $signedStatusBody;
    /** @var string GS2-Experience Status Signature */
    private $signedStatusSignature;
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
     * @return SetRecoverValueByStatusRequest
     */
	public function withNamespaceName(?string $namespaceName): SetRecoverValueByStatusRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Stamina Model Name */
	public function getStaminaName(): ?string {
		return $this->staminaName;
	}
    /** @param string|null $staminaName Stamina Model Name */
	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}
    /**
     * @param string|null $staminaName Stamina Model Name
     * @return SetRecoverValueByStatusRequest
     */
	public function withStaminaName(?string $staminaName): SetRecoverValueByStatusRequest {
		$this->staminaName = $staminaName;
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
     * @return SetRecoverValueByStatusRequest
     */
	public function withAccessToken(?string $accessToken): SetRecoverValueByStatusRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Encryption Key GRN */
	public function getKeyId(): ?string {
		return $this->keyId;
	}
    /** @param string|null $keyId Encryption Key GRN */
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
    /**
     * @param string|null $keyId Encryption Key GRN
     * @return SetRecoverValueByStatusRequest
     */
	public function withKeyId(?string $keyId): SetRecoverValueByStatusRequest {
		$this->keyId = $keyId;
		return $this;
	}
    /** @return string|null GS2-Experience status body to be signed */
	public function getSignedStatusBody(): ?string {
		return $this->signedStatusBody;
	}
    /** @param string|null $signedStatusBody GS2-Experience status body to be signed */
	public function setSignedStatusBody(?string $signedStatusBody) {
		$this->signedStatusBody = $signedStatusBody;
	}
    /**
     * @param string|null $signedStatusBody GS2-Experience status body to be signed
     * @return SetRecoverValueByStatusRequest
     */
	public function withSignedStatusBody(?string $signedStatusBody): SetRecoverValueByStatusRequest {
		$this->signedStatusBody = $signedStatusBody;
		return $this;
	}
    /** @return string|null GS2-Experience Status Signature */
	public function getSignedStatusSignature(): ?string {
		return $this->signedStatusSignature;
	}
    /** @param string|null $signedStatusSignature GS2-Experience Status Signature */
	public function setSignedStatusSignature(?string $signedStatusSignature) {
		$this->signedStatusSignature = $signedStatusSignature;
	}
    /**
     * @param string|null $signedStatusSignature GS2-Experience Status Signature
     * @return SetRecoverValueByStatusRequest
     */
	public function withSignedStatusSignature(?string $signedStatusSignature): SetRecoverValueByStatusRequest {
		$this->signedStatusSignature = $signedStatusSignature;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): SetRecoverValueByStatusRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?SetRecoverValueByStatusRequest {
        if ($data === null) {
            return null;
        }
        return (new SetRecoverValueByStatusRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withStaminaName(array_key_exists('staminaName', $data) && $data['staminaName'] !== null ? $data['staminaName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withKeyId(array_key_exists('keyId', $data) && $data['keyId'] !== null ? $data['keyId'] : null)
            ->withSignedStatusBody(array_key_exists('signedStatusBody', $data) && $data['signedStatusBody'] !== null ? $data['signedStatusBody'] : null)
            ->withSignedStatusSignature(array_key_exists('signedStatusSignature', $data) && $data['signedStatusSignature'] !== null ? $data['signedStatusSignature'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "staminaName" => $this->getStaminaName(),
            "accessToken" => $this->getAccessToken(),
            "keyId" => $this->getKeyId(),
            "signedStatusBody" => $this->getSignedStatusBody(),
            "signedStatusSignature" => $this->getSignedStatusSignature(),
        );
    }
}