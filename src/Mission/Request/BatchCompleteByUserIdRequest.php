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

namespace Gs2\Mission\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Mission\Model\Config;

/**
 * Request for batchCompleteByUserId: Issue transactions to receive rewards for multiple mission tasks in bulk by User ID
 *
 * @see https://docs.gs2.io/api_reference/mission/sdk/#batchcompletebyuserid
 */
class BatchCompleteByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Mission Group Name */
    private $missionGroupName;
    /** @var string User ID */
    private $userId;
    /** @var array Task name list */
    private $missionTaskNames;
    /** @var array Configuration values applied to transaction variables */
    private $config;
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
     * @return BatchCompleteByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): BatchCompleteByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Mission Group Name */
	public function getMissionGroupName(): ?string {
		return $this->missionGroupName;
	}
    /** @param string|null $missionGroupName Mission Group Name */
	public function setMissionGroupName(?string $missionGroupName) {
		$this->missionGroupName = $missionGroupName;
	}
    /**
     * @param string|null $missionGroupName Mission Group Name
     * @return BatchCompleteByUserIdRequest
     */
	public function withMissionGroupName(?string $missionGroupName): BatchCompleteByUserIdRequest {
		$this->missionGroupName = $missionGroupName;
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
     * @return BatchCompleteByUserIdRequest
     */
	public function withUserId(?string $userId): BatchCompleteByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return array|null Task name list */
	public function getMissionTaskNames(): ?array {
		return $this->missionTaskNames;
	}
    /** @param array|null $missionTaskNames Task name list */
	public function setMissionTaskNames(?array $missionTaskNames) {
		$this->missionTaskNames = $missionTaskNames;
	}
    /**
     * @param array|null $missionTaskNames Task name list
     * @return BatchCompleteByUserIdRequest
     */
	public function withMissionTaskNames(?array $missionTaskNames): BatchCompleteByUserIdRequest {
		$this->missionTaskNames = $missionTaskNames;
		return $this;
	}
    /** @return array|null Configuration values applied to transaction variables */
	public function getConfig(): ?array {
		return $this->config;
	}
    /** @param array|null $config Configuration values applied to transaction variables */
	public function setConfig(?array $config) {
		$this->config = $config;
	}
    /**
     * @param array|null $config Configuration values applied to transaction variables
     * @return BatchCompleteByUserIdRequest
     */
	public function withConfig(?array $config): BatchCompleteByUserIdRequest {
		$this->config = $config;
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
     * @return BatchCompleteByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): BatchCompleteByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): BatchCompleteByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?BatchCompleteByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new BatchCompleteByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withMissionGroupName(array_key_exists('missionGroupName', $data) && $data['missionGroupName'] !== null ? $data['missionGroupName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withMissionTaskNames(!array_key_exists('missionTaskNames', $data) || $data['missionTaskNames'] === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $data['missionTaskNames']
            ))
            ->withConfig(!array_key_exists('config', $data) || $data['config'] === null ? null : array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                $data['config']
            ))
            ->withTimeOffsetToken(array_key_exists('timeOffsetToken', $data) && $data['timeOffsetToken'] !== null ? $data['timeOffsetToken'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "missionGroupName" => $this->getMissionGroupName(),
            "userId" => $this->getUserId(),
            "missionTaskNames" => $this->getMissionTaskNames() === null ? null : array_map(
                function ($item) {
                    return $item;
                },
                $this->getMissionTaskNames()
            ),
            "config" => $this->getConfig() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig()
            ),
            "timeOffsetToken" => $this->getTimeOffsetToken(),
        );
    }
}