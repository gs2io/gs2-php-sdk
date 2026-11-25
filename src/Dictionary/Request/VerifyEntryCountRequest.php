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
 * Request for verifyEntryCount: Verify the number of collected entries
 *
 * @see https://docs.gs2.io/api_reference/dictionary/sdk/#verifyentrycount
 */
class VerifyEntryCountRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $accessToken;
    /** @var array List of entry model names to count. If omitted, all entries are counted */
    private $entryModelNames;
    /** @var string Type of verification */
    private $verifyType;
    /** @var int Value to compare with the number of collected entries */
    private $count;
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
     * @return VerifyEntryCountRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyEntryCountRequest {
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
     * @return VerifyEntryCountRequest
     */
	public function withAccessToken(?string $accessToken): VerifyEntryCountRequest {
		$this->accessToken = $accessToken;
		return $this;
	}
    /** @return array|null List of entry model names to count. If omitted, all entries are counted */
	public function getEntryModelNames(): ?array {
		return $this->entryModelNames;
	}
    /** @param array|null $entryModelNames List of entry model names to count. If omitted, all entries are counted */
	public function setEntryModelNames(?array $entryModelNames) {
		$this->entryModelNames = $entryModelNames;
	}
    /**
     * @param array|null $entryModelNames List of entry model names to count. If omitted, all entries are counted
     * @return VerifyEntryCountRequest
     */
	public function withEntryModelNames(?array $entryModelNames): VerifyEntryCountRequest {
		$this->entryModelNames = $entryModelNames;
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
     * @return VerifyEntryCountRequest
     */
	public function withVerifyType(?string $verifyType): VerifyEntryCountRequest {
		$this->verifyType = $verifyType;
		return $this;
	}
    /** @return int|null Value to compare with the number of collected entries */
	public function getCount(): ?int {
		return $this->count;
	}
    /** @param int|null $count Value to compare with the number of collected entries */
	public function setCount(?int $count) {
		$this->count = $count;
	}
    /**
     * @param int|null $count Value to compare with the number of collected entries
     * @return VerifyEntryCountRequest
     */
	public function withCount(?int $count): VerifyEntryCountRequest {
		$this->count = $count;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyEntryCountRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyEntryCountRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyEntryCountRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withEntryModelNames(!array_key_exists('entryModelNames', $data) || $data['entryModelNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['entryModelNames']
            ))
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withCount(array_key_exists('count', $data) && $data['count'] !== null ? $data['count'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "accessToken" => $this->getAccessToken(),
            "entryModelNames" => $this->getEntryModelNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getEntryModelNames()
            ),
            "verifyType" => $this->getVerifyType(),
            "count" => $this->getCount(),
        );
    }
}