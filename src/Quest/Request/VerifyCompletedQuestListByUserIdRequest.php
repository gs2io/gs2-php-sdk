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

namespace Gs2\Quest\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for verifyCompletedQuestListByUserId: Verify Completed Quest List by User ID
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#verifycompletedquestlistbyuserid
 */
class VerifyCompletedQuestListByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Quest Group Model Name */
    private $questGroupName;
    /** @var string Quest Model name */
    private $questName;
    /** @var string Type of verification */
    private $verifyType;
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
     * @return VerifyCompletedQuestListByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): VerifyCompletedQuestListByUserIdRequest {
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
     * @return VerifyCompletedQuestListByUserIdRequest
     */
	public function withUserId(?string $userId): VerifyCompletedQuestListByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Quest Group Model Name */
	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}
    /** @param string|null $questGroupName Quest Group Model Name */
	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}
    /**
     * @param string|null $questGroupName Quest Group Model Name
     * @return VerifyCompletedQuestListByUserIdRequest
     */
	public function withQuestGroupName(?string $questGroupName): VerifyCompletedQuestListByUserIdRequest {
		$this->questGroupName = $questGroupName;
		return $this;
	}
    /** @return string|null Quest Model name */
	public function getQuestName(): ?string {
		return $this->questName;
	}
    /** @param string|null $questName Quest Model name */
	public function setQuestName(?string $questName) {
		$this->questName = $questName;
	}
    /**
     * @param string|null $questName Quest Model name
     * @return VerifyCompletedQuestListByUserIdRequest
     */
	public function withQuestName(?string $questName): VerifyCompletedQuestListByUserIdRequest {
		$this->questName = $questName;
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
     * @return VerifyCompletedQuestListByUserIdRequest
     */
	public function withVerifyType(?string $verifyType): VerifyCompletedQuestListByUserIdRequest {
		$this->verifyType = $verifyType;
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
     * @return VerifyCompletedQuestListByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): VerifyCompletedQuestListByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): VerifyCompletedQuestListByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?VerifyCompletedQuestListByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new VerifyCompletedQuestListByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withQuestGroupName(array_key_exists('questGroupName', $data) && $data['questGroupName'] !== null ? $data['questGroupName'] : null)
            ->withQuestName(array_key_exists('questName', $data) && $data['questName'] !== null ? $data['questName'] : null)
            ->withVerifyType(array_key_exists('verifyType', $data) && $data['verifyType'] !== null ? $data['verifyType'] : null)
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "questGroupName" => $this->getQuestGroupName(),
            "questName" => $this->getQuestName(),
            "verifyType" => $this->getVerifyType(),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}