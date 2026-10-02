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

namespace Gs2\SerialKey\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for verifyCode: Verify the validity of the serial code
 *
 * @see https://docs.gs2.io/api_reference/serial_key/sdk/#verifycode
 */
class VerifyCodeRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Serial Code */
    private $code;
    /** @var string Campaign name */
    private $campaignModelName;
    /** @var string Verification type */
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
     * @return VerifyCodeRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyCodeRequest {
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
     * @return VerifyCodeRequest
     */
	public function withAccessToken(?string $accessToken): VerifyCodeRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Serial Code */
	public function getCode(): ?string {
		return $this->code;
	}
    /** @param string|null $code Serial Code */
	public function setCode(?string $code) {
		$this->code = $code;
	}
    /**
     * @param string|null $code Serial Code
     * @return VerifyCodeRequest
     */
	public function withCode(?string $code): VerifyCodeRequest {
		$this->code = $code;
		return $this;
	}
    /** @return string|null Campaign name */
	public function getCampaignModelName(): ?string {
		return $this->campaignModelName;
	}
    /** @param string|null $campaignModelName Campaign name */
	public function setCampaignModelName(?string $campaignModelName) {
		$this->campaignModelName = $campaignModelName;
	}
    /**
     * @param string|null $campaignModelName Campaign name
     * @return VerifyCodeRequest
     */
	public function withCampaignModelName(?string $campaignModelName): VerifyCodeRequest {
		$this->campaignModelName = $campaignModelName;
		return $this;
	}
    /** @return string|null Verification type */
	public function getVerifyType(): ?string {
		return $this->verifyType;
	}
    /** @param string|null $verifyType Verification type */
	public function setVerifyType(?string $verifyType) {
		$this->verifyType = $verifyType;
	}
    /**
     * @param string|null $verifyType Verification type
     * @return VerifyCodeRequest
     */
	public function withVerifyType(?string $verifyType): VerifyCodeRequest {
		$this->verifyType = $verifyType;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyCodeRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyCodeRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyCodeRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withCode(array_key_exists('code', $data) && $data['code'] !== null ? $data['code'] : null)
            ->withCampaignModelName(array_key_exists('campaignModelName', $data) && $data['campaignModelName'] !== null ? $data['campaignModelName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "code" => $this->getCode(),
            "campaignModelName" => $this->getCampaignModelName(),
            "verifyType" => $this->getVerifyType(),
        );
    }
}