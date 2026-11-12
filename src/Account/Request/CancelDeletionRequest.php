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
 * Request for cancelDeletion: Cancel the deletion request of the Game Player Account
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#canceldeletion
 */
class CancelDeletionRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Password */
    private $password;
    /** @var string Time offset token */
    private $timeOffsetToken;
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
     * @return CancelDeletionRequest
     */
	public function withNamespaceName(?string $namespaceName): CancelDeletionRequest {
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
     * @return CancelDeletionRequest
     */
	public function withUserId(?string $userId): CancelDeletionRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Password */
	public function getPassword(): ?string {
		return $this->password;
	}
    /** @param string|null $password Password */
	public function setPassword(?string $password) {
		$this->password = $password;
	}
    /**
     * @param string|null $password Password
     * @return CancelDeletionRequest
     */
	public function withPassword(?string $password): CancelDeletionRequest {
		$this->password = $password;
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
     * @return CancelDeletionRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): CancelDeletionRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CancelDeletionRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CancelDeletionRequest {
        if ($data === null) {
            return null;
        }
        return (new CancelDeletionRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "password" => $this->getPassword(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}