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

namespace Gs2\Schedule\Request;

use Gs2\Core\Control\Gs2BasicRequest;

/**
 * Request for getEventMaster: Get Event Master
 *
 * @see https://docs.gs2.io/api_reference/schedule/sdk/#geteventmaster
 */
class GetEventMasterRequest extends Gs2BasicRequest {
    /** @var string Namespace name */
    private $namespaceName;
    /** @var string Event name */
    private $eventName;
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
     * @return GetEventMasterRequest
     */
	public function withNamespaceName(?string $namespaceName): GetEventMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}
    /** @return string|null Event name */
	public function getEventName(): ?string {
		return $this->eventName;
	}
    /** @param string|null $eventName Event name */
	public function setEventName(?string $eventName) {
		$this->eventName = $eventName;
	}
    /**
     * @param string|null $eventName Event name
     * @return GetEventMasterRequest
     */
	public function withEventName(?string $eventName): GetEventMasterRequest {
		$this->eventName = $eventName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEventMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetEventMasterRequest())
            ->withNamespaceName(array_key_exists('namespaceName', $data) && $data['namespaceName'] !== null ? $data['namespaceName'] : null)
            ->withEventName(array_key_exists('eventName', $data) && $data['eventName'] !== null ? $data['eventName'] : null);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "eventName" => $this->getEventName(),
        );
    }
}