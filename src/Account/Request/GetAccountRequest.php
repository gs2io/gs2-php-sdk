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
 * Request for getAccount: Get Game Player Account
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#getaccount
 */
class GetAccountRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var bool Include last authenticated at */
    private $includeLastAuthenticatedAt;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return GetAccountRequest
     */
	public function withNamespaceName(?string $namespaceName): GetAccountRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null User ID */
	public function getUserId(): ?string {
		return $this->userId;
	}
    /** @param string|null $userId User ID */
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
    /**
     * @param string|null $userId User ID
     * @return GetAccountRequest
     */
	public function withUserId(?string $userId): GetAccountRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return bool|null Include last authenticated at */
	public function getIncludeLastAuthenticatedAt(): ?bool {
		return $this->includeLastAuthenticatedAt;
	}
    /** @param bool|null $includeLastAuthenticatedAt Include last authenticated at */
	public function setIncludeLastAuthenticatedAt(?bool $includeLastAuthenticatedAt) {
		$this->includeLastAuthenticatedAt = $includeLastAuthenticatedAt;
	}
    /**
     * @param bool|null $includeLastAuthenticatedAt Include last authenticated at
     * @return GetAccountRequest
     */
	public function withIncludeLastAuthenticatedAt(?bool $includeLastAuthenticatedAt): GetAccountRequest {
		$this->includeLastAuthenticatedAt = $includeLastAuthenticatedAt;
		return $this;
	}
    /** @return string|null Time offset token */
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
    /** @param string|null $timeOffsetToken Time offset token */
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
    /**
     * @param string|null $timeOffsetToken Time offset token
     * @return GetAccountRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): GetAccountRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

    public static function fromJson(?array $data): ?GetAccountRequest {
        if ($data === null) {
            return null;
        }
        return (new GetAccountRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withIncludeLastAuthenticatedAt(array_key_exists('includeLastAuthenticatedAt', $data) ? $data['includeLastAuthenticatedAt'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "includeLastAuthenticatedAt" => $this->getIncludeLastAuthenticatedAt(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}