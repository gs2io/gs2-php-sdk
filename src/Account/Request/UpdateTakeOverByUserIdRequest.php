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
 * Request for updateTakeOverByUserId: Update Takeover Information by User ID
 *
 * @see https://docs.gs2.io/api_reference/account/sdk/#updatetakeoverbyuserid
 */
class UpdateTakeOverByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var int Slot Number */
    private $type;
    /** @var string Old Password */
    private $oldPassword;
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
     * @return UpdateTakeOverByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): UpdateTakeOverByUserIdRequest {
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
     * @return UpdateTakeOverByUserIdRequest
     */
	public function withUserId(?string $userId): UpdateTakeOverByUserIdRequest {
		$this->userId = $userId;
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
     * @return UpdateTakeOverByUserIdRequest
     */
	public function withType(?int $type): UpdateTakeOverByUserIdRequest {
		$this->type = $type;
		return $this;
	}
    /** @return string|null Old Password */
	public function getOldPassword(): ?string {
		return $this->oldPassword;
	}
    /** @param string|null $oldPassword Old Password */
	public function setOldPassword(?string $oldPassword) {
		$this->oldPassword = $oldPassword;
	}
    /**
     * @param string|null $oldPassword Old Password
     * @return UpdateTakeOverByUserIdRequest
     */
	public function withOldPassword(?string $oldPassword): UpdateTakeOverByUserIdRequest {
		$this->oldPassword = $oldPassword;
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
     * @return UpdateTakeOverByUserIdRequest
     */
	public function withPassword(?string $password): UpdateTakeOverByUserIdRequest {
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
     * @return UpdateTakeOverByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): UpdateTakeOverByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): UpdateTakeOverByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?UpdateTakeOverByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new UpdateTakeOverByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withType(array_key_exists('type', $data) && $data['type'] !== null ? $data['type'] : null)
            ->withOldPassword(array_key_exists('oldPassword', $data) && $data['oldPassword'] !== null ? $data['oldPassword'] : null)
            ->withPassword(array_key_exists('password', $data) && $data['password'] !== null ? $data['password'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "type" => $this->getType(),
            "oldPassword" => $this->getOldPassword(),
            "password" => $this->getPassword(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}