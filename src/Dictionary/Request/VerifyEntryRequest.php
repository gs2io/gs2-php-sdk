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

namespace Gs2\Dictionary\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for verifyEntry: Verify Entry
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#verifyentry
 */
class VerifyEntryRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var string Entry Model name */
    private $entryModelName;
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
     * @return VerifyEntryRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyEntryRequest {
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
     * @return VerifyEntryRequest
     */
	public function withAccessToken(?string $accessToken): VerifyEntryRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return string|null Entry Model name */
	public function getEntryModelName(): ?string {
		return $this->entryModelName;
	}
    /** @param string|null $entryModelName Entry Model name */
	public function setEntryModelName(?string $entryModelName) {
		$this->entryModelName = $entryModelName;
	}
    /**
     * @param string|null $entryModelName Entry Model name
     * @return VerifyEntryRequest
     */
	public function withEntryModelName(?string $entryModelName): VerifyEntryRequest {
		$this->entryModelName = $entryModelName;
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
     * @return VerifyEntryRequest
     */
	public function withVerifyType(?string $verifyType): VerifyEntryRequest {
		$this->verifyType = $verifyType;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyEntryRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyEntryRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyEntryRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withEntryModelName(array_key_exists('entryModelName', $data) && $data['entryModelName'] !== null ? $data['entryModelName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "entryModelName" => $this->getEntryModelName(),
            "verifyType" => $this->getVerifyType(),
        );
    }
}