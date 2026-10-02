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

namespace Gs2\Formation\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Formation\Model\AcquireAction;
use Gs2\Formation\Model\Config;

/**
 * Request for acquireActionsToFormProperties: Apply acquire action to Form Properties by User ID
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#acquireactionstoformproperties
 */
class AcquireActionsToFormPropertiesRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Form Storage Area Model name */
    private $moldModelName;
    /** @var int Index of form */
    private $index;
    /** @var AcquireAction Get action to be applied to form properties */
    private $acquireAction;
    /** @var array List of Acquisition config */
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
     * @return AcquireActionsToFormPropertiesRequest
     */
	public function withNamespaceName(?string $namespaceName): AcquireActionsToFormPropertiesRequest {
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
     * @return AcquireActionsToFormPropertiesRequest
     */
	public function withUserId(?string $userId): AcquireActionsToFormPropertiesRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Form Storage Area Model name */
	public function getMoldModelName(): ?string {
		return $this->moldModelName;
	}
    /** @param string|null $moldModelName Form Storage Area Model name */
	public function setMoldModelName(?string $moldModelName) {
		$this->moldModelName = $moldModelName;
	}
    /**
     * @param string|null $moldModelName Form Storage Area Model name
     * @return AcquireActionsToFormPropertiesRequest
     */
	public function withMoldModelName(?string $moldModelName): AcquireActionsToFormPropertiesRequest {
		$this->moldModelName = $moldModelName;
		return $this;
	}
    /** @return int|null Index of form */
	public function getIndex(): ?int {
		return $this->index;
	}
    /** @param int|null $index Index of form */
	public function setIndex(?int $index) {
		$this->index = $index;
	}
    /**
     * @param int|null $index Index of form
     * @return AcquireActionsToFormPropertiesRequest
     */
	public function withIndex(?int $index): AcquireActionsToFormPropertiesRequest {
		$this->index = $index;
		return $this;
	}
    /** @return AcquireAction|null Get action to be applied to form properties */
	public function getAcquireAction(): ?AcquireAction {
		return $this->acquireAction;
	}
    /** @param AcquireAction|null $acquireAction Get action to be applied to form properties */
	public function setAcquireAction(?AcquireAction $acquireAction) {
		$this->acquireAction = $acquireAction;
	}
    /**
     * @param AcquireAction|null $acquireAction Get action to be applied to form properties
     * @return AcquireActionsToFormPropertiesRequest
     */
	public function withAcquireAction(?AcquireAction $acquireAction): AcquireActionsToFormPropertiesRequest {
		$this->acquireAction = $acquireAction;
		return $this;
	}
    /** @return array|null List of Acquisition config */
	public function getConfig(): ?array {
		return $this->config;
	}
    /** @param array|null $config List of Acquisition config */
	public function setConfig(?array $config) {
		$this->config = $config;
	}
    /**
     * @param array|null $config List of Acquisition config
     * @return AcquireActionsToFormPropertiesRequest
     */
	public function withConfig(?array $config): AcquireActionsToFormPropertiesRequest {
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
     * @return AcquireActionsToFormPropertiesRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AcquireActionsToFormPropertiesRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AcquireActionsToFormPropertiesRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireActionsToFormPropertiesRequest {
        if ($data === null) {
            return null;
        }
        return (new AcquireActionsToFormPropertiesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withMoldModelName(array_key_exists('moldModelName', $data) && $data['moldModelName'] !== null ? $data['moldModelName'] : null)
            ->withIndex(array_key_exists('index', $data) && $data['index'] !== null ? $data['index'] : null)
            ->withAcquireAction(array_key_exists('acquireAction', $data) && $data['acquireAction'] !== null ? AcquireAction::fromJson($data['acquireAction']) : null)
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
            "moldModelName" => $this->getMoldModelName(),
            "index" => $this->getIndex(),
            "acquireAction" => $this->getAcquireAction() !== null ? $this->getAcquireAction()->toJson() : null,
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