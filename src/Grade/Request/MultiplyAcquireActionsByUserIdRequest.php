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

namespace Gs2\Grade\Request;

use Gs2\Core\Control\Gs2BasicRequest;
use Gs2\Grade\Model\AcquireAction;

class MultiplyAcquireActionsByUserIdRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $userId;
    /** @var string */
    private $gradeName;
    /** @var string */
    private $propertyId;
    /** @var string */
    private $rateName;
    /** @var array */
    private $acquireActions;
    /** @var string */
    private $duplicationAvoider;
	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}
	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}
	public function withNamespaceName(?string $namespaceName): MultiplyAcquireActionsByUserIdRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
	public function getUserId(): ?string {
		return $this->userId;
	}
	public function setUserId(?string $userId) {
		$this->userId = $userId;
	}
	public function withUserId(?string $userId): MultiplyAcquireActionsByUserIdRequest {
		$this->userId = $userId;
		return $this;
	}
	public function getGradeName(): ?string {
		return $this->gradeName;
	}
	public function setGradeName(?string $gradeName) {
		$this->gradeName = $gradeName;
	}
	public function withGradeName(?string $gradeName): MultiplyAcquireActionsByUserIdRequest {
		$this->gradeName = $gradeName;
		return $this;
	}
	public function getPropertyId(): ?string {
		return $this->propertyId;
	}
	public function setPropertyId(?string $propertyId) {
		$this->propertyId = $propertyId;
	}
	public function withPropertyId(?string $propertyId): MultiplyAcquireActionsByUserIdRequest {
		$this->propertyId = $propertyId;
		return $this;
	}
	public function getRateName(): ?string {
		return $this->rateName;
	}
	public function setRateName(?string $rateName) {
		$this->rateName = $rateName;
	}
	public function withRateName(?string $rateName): MultiplyAcquireActionsByUserIdRequest {
		$this->rateName = $rateName;
		return $this;
	}
	public function getAcquireActions(): ?array {
		return $this->acquireActions;
	}
	public function setAcquireActions(?array $acquireActions) {
		$this->acquireActions = $acquireActions;
	}
	public function withAcquireActions(?array $acquireActions): MultiplyAcquireActionsByUserIdRequest {
		$this->acquireActions = $acquireActions;
		return $this;
	}

	public function getDuplicationAvoider(): ?string {
		return $this->duplicationAvoider;
	}

	public function setDuplicationAvoider(?string $duplicationAvoider) {
		$this->duplicationAvoider = $duplicationAvoider;
	}

	public function withDuplicationAvoider(?string $duplicationAvoider): MultiplyAcquireActionsByUserIdRequest {
		$this->duplicationAvoider = $duplicationAvoider;
		return $this;
	}

    public static function fromJson(?array $data): ?MultiplyAcquireActionsByUserIdRequest {
        if ($data === null) {
            return null;
        }
        return (new MultiplyAcquireActionsByUserIdRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withUserId(array_key_exists('userId', $data) && $data['userId'] !== null ? $data['userId'] : null)
            ->withGradeName(array_key_exists('gradeName', $data) && $data['gradeName'] !== null ? $data['gradeName'] : null)
            ->withPropertyId(array_key_exists('propertyId', $data) && $data['propertyId'] !== null ? $data['propertyId'] : null)
            ->withRateName(array_key_exists('rateName', $data) && $data['rateName'] !== null ? $data['rateName'] : null)
            ->withAcquireActions(array_map(
                function ($item) {
                    return AcquireAction::fromJson($item);
                },
                array_key_exists('acquireActions', $data) && $data['acquireActions'] !== null ? $data['acquireActions'] : []
            ));
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "userId" => $this->getUserId(),
            "gradeName" => $this->getGradeName(),
            "propertyId" => $this->getPropertyId(),
            "rateName" => $this->getRateName(),
            "acquireActions" => array_map(
                function ($item) {
                    return $item->toJson();
                },
                $this->getAcquireActions() !== null && $this->getAcquireActions() !== null ? $this->getAcquireActions() : []
            ),
        );
    }
}