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
 * Request for start: Start Quest
 *
 * @see https://docs.gs2.io/api_reference/quest/sdk/#start
 */
class StartRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Quest Group Model name */
    private $questGroupName;
    /** @var string Quest Model name */
    private $questName;
    /** @var string User ID */
    private $accessToken;
    /** @var bool If have a quest already started, you can discard it and start it */
    private $force;
    /** @var array Configuration values applied to transaction variables */
    private $config;
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
     * @return StartRequest
     */
	public function withNamespaceName(?string $namespaceName): StartRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Quest Group Model name */
	public function getQuestGroupName(): ?string {
		return $this->questGroupName;
	}
    /** @param string|null $questGroupName Quest Group Model name */
	public function setQuestGroupName(?string $questGroupName) {
		$this->questGroupName = $questGroupName;
	}
    /**
     * @param string|null $questGroupName Quest Group Model name
     * @return StartRequest
     */
	public function withQuestGroupName(?string $questGroupName): StartRequest {
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
     * @return StartRequest
     */
	public function withQuestName(?string $questName): StartRequest {
		$this->questName = $questName;
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
     * @return StartRequest
     */
	public function withAccessToken(?string $accessToken): StartRequest {
		$this->accessToken = $accessToken;
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
     * @return StartRequest
     */
	public function withForce(?bool $force): StartRequest {
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
     * @return StartRequest
     */
	public function withConfig(?array $config): StartRequest {
		$this->config = $config;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): StartRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?StartRequest {
        if ($data === null) {
            return null;
        }
        return (new StartRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withQuestGroupName(array_key_exists('questGroupName', $data) && $data['questGroupName'] !== null ? $data['questGroupName'] : null)
            ->withQuestName(array_key_exists('questName', $data) && $data['questName'] !== null ? $data['questName'] : null)
            ->withAccessToken(array_key_exists('accessToken', $data) && $data['accessToken'] !== null ? $data['accessToken'] : null)
            ->withForce(array_key_exists('force', $data) ? $data['force'] : null)
            ->withConfig(!array_key_exists('config', $data) || $data['config'] === null ? null : array_map(
                function ($item) {
                    return Config::fromJson($item);
                },
                $data['config']
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "questGroupName" => $this->getQuestGroupName(),
            "questName" => $this->getQuestName(),
            "accessToken" => $this->getAccessToken(),
            "force" => $this->getForce(),
            "config" => $this->getConfig() === null ? null : array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig()
            ),
        );
    }
}