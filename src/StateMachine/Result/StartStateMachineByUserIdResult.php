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

namespace Gs2\StateMachine\Result;

use Gs2\Core\Model\IResult;
use Gs2\StateMachine\Model\RandomUsed;
use Gs2\StateMachine\Model\RandomStatus;
use Gs2\StateMachine\Model\StackEntry;
use Gs2\StateMachine\Model\Variable;
use Gs2\StateMachine\Model\Status;

/**
 * Result of startStateMachineByUserId: Start state machine by User ID
 *
 * @see https://docs.gs2.io/api_reference/state_machine/sdk/#startstatemachinebyuserid
 */
class StartStateMachineByUserIdResult implements IResult {
    /** @var Status Started state machine */
    private $item;

    /** @return Status|null Started state machine */
	public function getItem(): ?Status {
		return $this->item;
	}

    /** @param Status|null $item Started state machine */
	public function setItem(?Status $item) {
		$this->item = $item;
	}

    /**
     * @param Status|null $item Started state machine
     * @return StartStateMachineByUserIdResult
     */
	public function withItem(?Status $item): StartStateMachineByUserIdResult {
		$this->item = $item;
		return $this;
	}

    public static function fromJson(?array $data): ?StartStateMachineByUserIdResult {
        if ($data === null) {
            return null;
        }
        return (new StartStateMachineByUserIdResult())
            ->withItem(array_key_exists('item', $data) && $data['item'] !== null ? Status::fromJson($data['item']) : null);
    }

    public function toJson(): array {
        return array(
            "item" => $this->getItem() !== null ? $this->getItem()->toJson() : null,
        );
    }
}