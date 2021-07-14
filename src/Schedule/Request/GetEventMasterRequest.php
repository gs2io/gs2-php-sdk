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

class GetEventMasterRequest extends Gs2BasicRequest {
    /** @var string */
    private $namespaceName;
    /** @var string */
    private $eventName;

	public function getNamespaceName(): ?string {
		return $this->namespaceName;
	}

	public function setNamespaceName(?string $namespaceName) {
		$this->namespaceName = $namespaceName;
	}

	public function withNamespaceName(?string $namespaceName): GetEventMasterRequest {
		$this->namespaceName = $namespaceName;
		return $this;
	}

	public function getEventName(): ?string {
		return $this->eventName;
	}

	public function setEventName(?string $eventName) {
		$this->eventName = $eventName;
	}

	public function withEventName(?string $eventName): GetEventMasterRequest {
		$this->eventName = $eventName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEventMasterRequest {
        if ($data === null) {
            return null;
        }
        return (new GetEventMasterRequest())
            ->withNamespaceName(empty($data['namespaceName']) ? null : $data['namespaceName'])
            ->withEventName(empty($data['eventName']) ? null : $data['eventName']);
    }

    public function toJson(): array {
        return array(
            "namespaceName" => $this->getNamespaceName(),
            "eventName" => $this->getEventName(),
        );
    }
}