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

class SetRecoverIntervalByStatusRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $staminaName;
    /** @var string */
    private $accessToken;
    /** @var string */
    private $keyId;
    /** @var string */
    private $signedStatusBody;
    /** @var string */
    private $signedStatusSignature;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): SetRecoverIntervalByStatusRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getStaminaName(): ?string {
		return $this->staminaName;
	}
	public function setStaminaName(?string $staminaName) {
		$this->staminaName = $staminaName;
	}
	public function withStaminaName(?string $staminaName): SetRecoverIntervalByStatusRequest {
		$this->staminaName = $staminaName;
		return $this;
	}
	public function getAccessToken(): ?string {
		return $this->accessToken;
	}
	public function setAccessToken(?string $accessToken) {
		$this->accessToken = $accessToken;
	}
	public function withAccessToken(?string $accessToken): SetRecoverIntervalByStatusRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
	public function getKeyId(): ?string {
		return $this->keyId;
	}
	public function setKeyId(?string $keyId) {
		$this->keyId = $keyId;
	}
	public function withKeyId(?string $keyId): SetRecoverIntervalByStatusRequest {
		$this->keyId = $keyId;
		return $this;
	}
	public function getSignedStatusBody(): ?string {
		return $this->signedStatusBody;
	}
	public function setSignedStatusBody(?string $signedStatusBody) {
		$this->signedStatusBody = $signedStatusBody;
	}
	public function withSignedStatusBody(?string $signedStatusBody): SetRecoverIntervalByStatusRequest {
		$this->signedStatusBody = $signedStatusBody;
		return $this;
	}
	public function getSignedStatusSignature(): ?string {
		return $this->signedStatusSignature;
	}
	public function setSignedStatusSignature(?string $signedStatusSignature) {
		$this->signedStatusSignature = $signedStatusSignature;
	}
	public function withSignedStatusSignature(?string $signedStatusSignature): SetRecoverIntervalByStatusRequest {
		$this->signedStatusSignature = $signedStatusSignature;
		return $this;
	}

    public static function fromJson(?array $data): ?SetRecoverIntervalByStatusRequest {
        if ($data === null) {
            return null;
        }
        return (new SetRecoverIntervalByStatusRequest())
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