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

class GetAccountRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var bool */
    private $includeLastAuthenticatedAt;
    /** @var string */
    private $timeOffsetToken;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): GetAccountRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): GetAccountRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getIncludeLastAuthenticatedAt(): ?bool {
		return $this->includeLastAuthenticatedAt;
	}
	public function setIncludeLastAuthenticatedAt(?bool $includeLastAuthenticatedAt) {
		$this->includeLastAuthenticatedAt = $includeLastAuthenticatedAt;
	}
	public function withIncludeLastAuthenticatedAt(?bool $includeLastAuthenticatedAt): GetAccountRequest {
		$this->includeLastAuthenticatedAt = $includeLastAuthenticatedAt;
		return $this;
	}
	public function getTimeOffsetToken(): ?string {
		return $this->timeOffsetToken;
	}
	public function setTimeOffsetToken(?string $timeOffsetToken) {
		$this->timeOffsetToken = $timeOffsetToken;
	}
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