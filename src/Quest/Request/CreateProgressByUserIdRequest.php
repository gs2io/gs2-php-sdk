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
use Gs2\Quest\Model\Config;

/**
 * Request for createProgressByUserId: Create Quest Progress by User ID
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#createprogressbyuserid
 */
class CreateProgressByUserIdRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Quest Model GRN to Start */
    private $questModelId;
    /** @var bool If have a quest already started, you can discard it and start it */
    private $force;
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
     * @return CreateProgressByUserIdRequest
     */
	public function withNamespaceName(?string $namespaceName): CreateProgressByUserIdRequest {
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
     * @return CreateProgressByUserIdRequest
     */
	public function withUserId(?string $userId): CreateProgressByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Quest Model GRN to Start */
	public function getQuestModelId(): ?string {
		return $this->questModelId;
	}
    /** @param string|null $questModelId Quest Model GRN to Start */
	public function setQuestModelId(?string $questModelId) {
		$this->questModelId = $questModelId;
	}
    /**
     * @param string|null $questModelId Quest Model GRN to Start
     * @return CreateProgressByUserIdRequest
     */
	public function withQuestModelId(?string $questModelId): CreateProgressByUserIdRequest {
		$this->questModelId = $questModelId;
		return $this;
	}
    /** @return bool|null If have a quest already started, you can discard it and start it */
	public function getForce(): ?bool {
		return $this->force;
	}
    /** @param bool|null $force If have a quest already started, you can discard it and start it */
	public function setForce(?bool $force) {
		$this->force = $force;
	}
    /**
     * @param bool|null $force If have a quest already started, you can discard it and start it
     * @return CreateProgressByUserIdRequest
     */
	public function withForce(?bool $force): CreateProgressByUserIdRequest {
		$this->force = $force;
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
     * @return CreateProgressByUserIdRequest
     */
	public function withConfig(?array $config): CreateProgressByUserIdRequest {
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
     * @return CreateProgressByUserIdRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): CreateProgressByUserIdRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): CreateProgressByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?CreateProgressByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new CreateProgressByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withQuestModelId(array_key_exists('questModelId', $data) && $data['questModelId'] !== null ? $data['questModelId'] : null)
            ->withForce(array_key_exists('force', $data) ? $data['force'] : null)
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
            "userId" => $this->getUserId(),
            "questModelId" => $this->getQuestModelId(),
            "force" => $this->getForce(),
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