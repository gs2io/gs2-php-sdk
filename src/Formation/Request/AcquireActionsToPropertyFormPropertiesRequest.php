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
 * Request for acquireActionsToPropertyFormProperties: Apply acquire action to property form properties
 *
 * @see https://docs.gs2.io/api_reference/formation/sdk/#acquireactionstopropertyformproperties
 */
class AcquireActionsToPropertyFormPropertiesRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string User ID */
    private $userId;
    /** @var string Property Form Model name */
    private $propertyFormModelName;
    /** @var string Property ID */
    private $propertyId;
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
     * @return AcquireActionsToPropertyFormPropertiesRequest
     */
	public function withNamespaceName(?string $namespaceName): AcquireActionsToPropertyFormPropertiesRequest {
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
     * @return AcquireActionsToPropertyFormPropertiesRequest
     */
	public function withUserId(?string $userId): AcquireActionsToPropertyFormPropertiesRequest {
		$this->userId = $userId;
		return $this;
	}
    /** @return string|null Property Form Model name */
	public function getPropertyFormModelName(): ?string {
		return $this->propertyFormModelName;
	}
    /** @param string|null $propertyFormModelName Property Form Model name */
	public function setPropertyFormModelName(?string $propertyFormModelName) {
		$this->propertyFormModelName = $propertyFormModelName;
	}
    /**
     * @param string|null $propertyFormModelName Property Form Model name
     * @return AcquireActionsToPropertyFormPropertiesRequest
     */
	public function withPropertyFormModelName(?string $propertyFormModelName): AcquireActionsToPropertyFormPropertiesRequest {
		$this->propertyFormModelName = $propertyFormModelName;
		return $this;
	}
    /** @return string|null Property ID */
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
    /** @param string|null $propertyId Property ID */
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
    /**
     * @param string|null $propertyId Property ID
     * @return AcquireActionsToPropertyFormPropertiesRequest
     */
	public function withPropertyId(?string $propertyId): AcquireActionsToPropertyFormPropertiesRequest {
		$this->propertyId = $propertyId;
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
     * @return AcquireActionsToPropertyFormPropertiesRequest
     */
	public function withAcquireAction(?AcquireAction $acquireAction): AcquireActionsToPropertyFormPropertiesRequest {
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
     * @return AcquireActionsToPropertyFormPropertiesRequest
     */
	public function withConfig(?array $config): AcquireActionsToPropertyFormPropertiesRequest {
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
     * @return AcquireActionsToPropertyFormPropertiesRequest
     */
	public function withTimeOffsetToken(?string $timeOffsetToken): AcquireActionsToPropertyFormPropertiesRequest {
		$this->timeOffsetToken = $timeOffsetToken;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): AcquireActionsToPropertyFormPropertiesRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?AcquireActionsToPropertyFormPropertiesRequest {
        if ($data === null) {
            return null;
        }
        return (new AcquireActionsToPropertyFormPropertiesRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withPropertyFormModelName(array_key_exists('propertyFormModelName', $data) && $data['propertyFormModelName'] !== null ? $data['propertyFormModelName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
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
            "propertyFormModelName" => $this->getPropertyFormModelName(),
            "propertyId" => $this->getPropertyId(),
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