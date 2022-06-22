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
use Gs2\Formation\Model\AcquireActionConfig;

class AcquireActionsToPropertyFormPropertiesRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $formModelName;
    /** @var string */
    private $propertyId;
    /** @var AcquireAction */
    private $acquireAction;
    /** @var array */
    private $config;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): AcquireActionsToPropertyFormPropertiesRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): AcquireActionsToPropertyFormPropertiesRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getFormModelName(): ?string {
		return $this->formModelName;
	}
	public function setFormModelName(?string $formModelName) {
		$this->formModelName = $formModelName;
	}
	public function withFormModelName(?string $formModelName): AcquireActionsToPropertyFormPropertiesRequest {
		$this->formModelName = $formModelName;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): AcquireActionsToPropertyFormPropertiesRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getAcquireAction(): ?AcquireAction {
		return $this->acquireAction;
	}
	public function setAcquireAction(?AcquireAction $acquireAction) {
		$this->acquireAction = $acquireAction;
	}
	public function withAcquireAction(?AcquireAction $acquireAction): AcquireActionsToPropertyFormPropertiesRequest {
		$this->acquireAction = $acquireAction;
		return $this;
	}
	public function getConfig(): ?array {
		return $this->config;
	}
	public function setConfig(?array $config) {
		$this->config = $config;
	}
	public function withConfig(?array $config): AcquireActionsToPropertyFormPropertiesRequest {
		$this->config = $config;
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
            ->withFormModelName(array_key_exists('formModelName', $data) && $data['formModelName'] !== null ? $data['formModelName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withAcquireAction(array_key_exists('acquireAction', $data) && $data['acquireAction'] !== null ? AcquireAction::fromJson($data['acquireAction']) : null)
            ->withConfig(array_map(
                function ($item) {
                    return AcquireActionConfig::fromJson($item);
                },
                array_key_exists('config', $data) && $data['config'] !== null ? $data['config'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "formModelName" => $this->getFormModelName(),
            "propertyId" => $this->getPropertyId(),
            "acquireAction" => $this->getAcquireAction() !== null ? $this->getAcquireAction()->toJson() : null,
            "config" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getConfig() !== null && $this->getConfig() !== null ? $this->getConfig() : []
            ),
        );
    }
}