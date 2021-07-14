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

namespace Gs2\Deploy\Request;

use Gs2\Core\Control\Gs2BasicRequest;

class GetEventRequest extends Gs2BasicRequest {
    /** @var string */
    private $stackName;
    /** @var string */
    private $eventName;

	public function getStackName(): ?string {
		return $this->stackName;
	}

	public function setStackName(?string $stackName) {
		$this->stackName = $stackName;
	}

	public function withStackName(?string $stackName): GetEventRequest {
		$this->stackName = $stackName;
		return $this;
	}

	public function getEventName(): ?string {
		return $this->eventName;
	}

	public function setEventName(?string $eventName) {
		$this->eventName = $eventName;
	}

	public function withEventName(?string $eventName): GetEventRequest {
		$this->eventName = $eventName;
		return $this;
	}

    public static function fromJson(?array $data): ?GetEventRequest {
        if ($data === null) {
            return null;
        }
        return (new GetEventRequest())
            ->withStackName(empty($data['stackName']) ? null : $data['stackName'])
            ->withEventName(empty($data['eventName']) ? null : $data['eventName']);
    }

    public function toJson(): array {
        return array(
            "stackName" => $this->getStackName(),
            "eventName" => $this->getEventName(),
        );
    }
}